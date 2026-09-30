let dashboardClockInterval = null;

const updateDashboardClock = () => {
    const dateElement = document.getElementById('dashboard-date');
    const timeElement = document.getElementById('dashboard-time');

    if (!dateElement || !timeElement) return false;

    const timeZone = timeElement.dataset.timezone || 'Asia/Jakarta';
    const currentTime = new Date();

    dateElement.textContent = new Intl.DateTimeFormat('id-ID', {
        timeZone,
        weekday: 'long',
        day: '2-digit',
        month: 'long',
        year: 'numeric',
    }).format(currentTime);

    timeElement.dateTime = currentTime.toISOString();
    const timeParts = new Intl.DateTimeFormat('id-ID', {
        timeZone,
        hour: '2-digit',
        minute: '2-digit',
        hourCycle: 'h23',
    }).formatToParts(currentTime);
    const hour = timeParts.find((part) => part.type === 'hour')?.value ?? '00';
    const minute = timeParts.find((part) => part.type === 'minute')?.value ?? '00';
    timeElement.textContent = `${hour}:${minute} WIB`;

    return true;
};

const startDashboardClock = () => {
    if (dashboardClockInterval) {
        window.clearInterval(dashboardClockInterval);
        dashboardClockInterval = null;
    }

    if (!updateDashboardClock()) return;

    dashboardClockInterval = window.setInterval(updateDashboardClock, 15000);
};

startDashboardClock();
document.addEventListener('stockify:page-loaded', startDashboardClock);
