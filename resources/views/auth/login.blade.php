<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Inter', sans-serif; }
</style>
</head>
<body class="bg-white text-black min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-sm">

    <div class="mb-8 text-center">
      <h1 class="text-2xl font-semibold tracking-tight">Welcome back</h1>
      <p class="text-sm text-black/60 mt-1">Log in to continue to your account</p>
    </div>

    @if ($errors->any())
      <div class="mb-4 text-sm text-black border border-black/20 rounded-lg px-3.5 py-2.5">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-medium mb-1.5">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required
          class="w-full rounded-lg border border-black/20 px-3.5 py-2.5 text-sm placeholder:text-black/30 focus:outline-none focus:border-black transition-colors">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1.5">Password</label>
        <input type="password" name="password" placeholder="••••••••" required
          class="w-full rounded-lg border border-black/20 px-3.5 py-2.5 text-sm placeholder:text-black/30 focus:outline-none focus:border-black transition-colors">
      </div>
      <button type="submit"
        class="w-full bg-black text-white rounded-lg py-2.5 text-sm font-medium hover:bg-black/85 transition-colors">
        Log in
      </button>
    </form>

    <p class="text-center text-sm text-black/60 mt-6">
      Don't have an account?
      <a href="{{ route('register') }}" class="text-black font-medium hover:underline">Sign up</a>
    </p>

  </div>

</body>
</html>