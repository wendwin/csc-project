{{-- HANDLE BY PUTRA --}}
<header class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
          <h1 class="text-xl font-semibold text-gray-800">Dashboard Admin</h1>
          <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Halo, {{ Auth::user()->name }}</span>
              <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline bg-transparent border-none p-0 m-0">
                        Logout
                    </button>
                </form>                
          </div>
      </header>
      