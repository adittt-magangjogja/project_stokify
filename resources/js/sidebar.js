const sidebar = document.getElementById('sidebar');
const sidebarBackdrop = document.getElementById('sidebarBackdrop');
const toggleSidebarMobile = document.getElementById('toggleSidebarMobile');
const mainContent = document.getElementById('main-content');
const navigationProgress = document.getElementById('navigation-progress');

if (sidebar && sidebarBackdrop && toggleSidebarMobile) {
    const closeSidebar = () => {
        sidebar.classList.add('hidden');
        sidebarBackdrop.classList.add('hidden');
        toggleSidebarMobile.setAttribute('aria-expanded', 'false');
    };

    toggleSidebarMobile.addEventListener('click', () => {
        if (window.matchMedia('(min-width: 1024px)').matches) {
            document.body.classList.toggle('sidebar-collapsed');
            return;
        }

        const willOpen = sidebar.classList.contains('hidden');
        sidebar.classList.toggle('hidden', !willOpen);
        sidebarBackdrop.classList.toggle('hidden', !willOpen);
        toggleSidebarMobile.setAttribute('aria-expanded', String(willOpen));
    });

    sidebarBackdrop.addEventListener('click', closeSidebar);

    const markCurrentLink = (url) => {
        const currentPath = url.pathname.replace(/\/$/, '') || '/';

        sidebar.querySelectorAll('a.sidebar-link').forEach((link) => {
            const linkUrl = new URL(link.href, window.location.origin);
            const linkPath = linkUrl.pathname.replace(/\/$/, '') || '/';
            const isActive = currentPath === linkPath || (linkPath !== '/' && currentPath.startsWith(`${linkPath}/`));
            link.classList.toggle('is-active', isActive);
        });
    };

    const loadPage = async (url, { addHistory = false } = {}) => {
        if (!mainContent) return false;

        mainContent.classList.add('is-navigating');
        navigationProgress?.classList.add('is-visible');

        try {
            const response = await fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' },
                credentials: 'same-origin',
            });

            if (!response.ok || response.redirected || !response.headers.get('content-type')?.includes('text/html')) {
                window.location.assign(response.url || url.href);
                return false;
            }

            const html = await response.text();
            const nextDocument = new DOMParser().parseFromString(html, 'text/html');
            const nextMain = nextDocument.querySelector('#main-content > main');
            const currentMain = mainContent.querySelector(':scope > main');

            if (!nextMain || !currentMain) {
                window.location.assign(url.href);
                return false;
            }

            currentMain.innerHTML = nextMain.innerHTML;
            document.title = nextDocument.title || document.title;
            document.dispatchEvent(new Event('stockify:page-loaded'));

            if (addHistory) history.pushState({ sidebarNavigation: true }, '', url.href);
            markCurrentLink(url);
            closeSidebar();
            window.scrollTo({ top: 0, behavior: 'smooth' });

            return true;
        } catch (error) {
            window.location.assign(url.href);
            return false;
        } finally {
            window.setTimeout(() => {
                mainContent.classList.remove('is-navigating');
                navigationProgress?.classList.remove('is-visible');
            }, 120);
        }
    };

    sidebar.addEventListener('click', (event) => {
        const link = event.target.closest('a.sidebar-link');
        if (!link || event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;

        const url = new URL(link.href, window.location.href);
        if (url.origin !== window.location.origin || link.target === '_blank' || url.href === window.location.href) return;

        event.preventDefault();
        loadPage(url, { addHistory: true });
    });

    window.addEventListener('popstate', () => loadPage(new URL(window.location.href)));
    markCurrentLink(new URL(window.location.href));
}
