<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SecureCore - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --color-bg-primary: #0f172a;
      --color-bg-secondary: #1e293b;
      --color-bg-tertiary: #334155;
      --color-accent: #10b981;
      --color-accent-dark: #059669;
      --color-text-primary: #f1f5f9;
      --color-text-secondary: #cbd5e1;
      --color-border: #334155;
    }

    body {
      background: linear-gradient(135deg, #0f172a 0%, #1a2342 100%);
      color: var(--color-text-primary);
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      min-height: 100vh;
    }

    .input-field {
      background-color: rgba(30, 41, 59, 0.7);
      border: 1px solid var(--color-border);
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      color: var(--color-text-primary);
      backdrop-filter: blur(4px);
      transition: all 0.2s;
    }

    .input-field:focus {
      outline: none;
      border-color: var(--color-accent);
      background-color: rgba(30, 41, 59, 0.9);
      box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.1);
    }

    .input-field::placeholder {
      color: var(--color-text-secondary);
    }

    .btn-primary {
      background-color: var(--color-accent);
      color: var(--color-bg-primary);
      border: none;
      border-radius: 0.5rem;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background-color: var(--color-accent-dark);
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(16, 185, 129, 0.2);
    }

    .btn-primary:active {
      transform: translateY(0);
    }

    .form-container {
      background: linear-gradient(135deg, rgba(30, 41, 59, 0.5) 0%, rgba(15, 23, 42, 0.7) 100%);
      border: 1px solid var(--color-border);
      border-radius: 0.75rem;
      backdrop-filter: blur(8px);
      padding: 2.5rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .link-accent {
      color: var(--color-accent);
      text-decoration: none;
      transition: opacity 0.2s;
    }

    .link-accent:hover {
      opacity: 0.8;
    }

    .divider {
      border-color: var(--color-border);
    }
  </style>
</head>
<body>
  <div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
      <!-- Header -->
      <div class="text-center mb-8">
        <div class="flex items-center justify-center mb-4">
          <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-lg flex items-center justify-center shadow-lg">
            <svg class="w-7 h-7 text-slate-950" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <h1 class="text-3xl font-bold text-slate-100">SecureCore</h1>
        <p class="text-slate-400 text-sm mt-2">Enterprise Authentication System</p>
      </div>

      <!-- Login Form -->
      <form class="form-container space-y-6">
        <div>
          <label for="email" class="block text-sm font-medium text-slate-200 mb-2">Email Address</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            class="input-field w-full" 
            placeholder="you@example.com"
            required
          />
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-slate-200 mb-2">Password</label>
          <input 
            type="password" 
            id="password" 
            name="password" 
            class="input-field w-full" 
            placeholder="••••••••"
            required
          />
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input 
              type="checkbox" 
              name="remember" 
              class="w-4 h-4 rounded" 
              style="accent-color: var(--color-accent);"
            />
            <span class="text-sm text-slate-300">Remember me</span>
          </label>
          <a href="#" class="text-sm link-accent">Forgot password?</a>
        </div>

        <button type="submit" class="btn-primary w-full py-2.5 text-base">
          Sign In
        </button>

        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t divider"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2" style="background-color: var(--color-bg-primary);">
              <span class="text-slate-400">New to SecureCore?</span>
            </span>
          </div>
        </div>

        <a href="register.php" class="block w-full text-center py-2.5 px-4 rounded-md border border-slate-600 text-slate-200 font-medium transition-all hover:bg-slate-900 hover:border-emerald-500">
          Create Account
        </a>
      </form>

      <!-- Footer -->
      <div class="text-center mt-8 text-xs text-slate-500">
        <p>© 2026 SecureCore. All rights reserved.</p>
      </div>
    </div>
  </div>
</body>
</html>
