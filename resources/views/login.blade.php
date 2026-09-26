<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h1>

    <form>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
        <input type="email" placeholder="nama@email.com"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
        <input type="password" placeholder="••••••••"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit"
        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
        Masuk
      </button>
    </form>

    <p class="text-sm text-gray-500 text-center mt-4">
      Belum punya akun? <a href="#" class="text-blue-500 hover:underline">Daftar</a>
    </p>
  </div>

</body>
</html>