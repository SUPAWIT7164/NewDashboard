<script setup>
import { mdiLogout, mdiWeatherNight, mdiWeatherSunny, mdiAccount, mdiChartBox } from "@mdi/js";
import { containerMaxW } from "@/config.js";
import BaseIcon from "@/Components/BaseIcon.vue";
import { useDarkModeStore } from "@/Stores/darkMode.js";
import { router, usePage } from "@inertiajs/vue3";

const darkModeStore = useDarkModeStore();

// Get user data from Inertia page props
const user = usePage().props.auth?.user || { name: 'Admin' };

const toggleDarkMode = () => {
  darkModeStore.set();
};

const logout = () => {
  router.post(route("logout"));
};

const goToXMReport = () => {
  router.get('/admin/xm');
};
</script>

<template>
  <nav
    class="fixed inset-x-0 z-30 w-screen bg-gradient-to-r from-white to-blue-50 h-16 transition-position lg:w-auto dark:from-slate-900 dark:to-slate-800 shadow-lg backdrop-blur-sm border-b border-blue-200 dark:border-slate-700"
  >
    <div class="flex lg:items-stretch" :class="containerMaxW">
      <div class="flex items-stretch flex-1 h-16">
        <!-- Logo and Brand -->
        <div class="flex items-center px-8">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
              </svg>
            </div>
            <div>
              <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Exness Dashboard</span>
              <div class="text-xs text-gray-500 dark:text-gray-400 font-medium">Admin Panel</div>
            </div>
          </div>
        </div>
        <slot />
      </div>
      
      <!-- Right Side Controls -->
      <div class="flex items-center space-x-4 px-6">
        <!-- XM Report Button -->
        <button
          @click="goToXMReport"
          class="flex items-center justify-center px-4 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 space-x-2"
        >
          <BaseIcon
            :path="mdiChartBox"
            size="20"
          />
          <span class="font-semibold">XM Report</span>
        </button>

        <!-- Dark Mode Toggle -->
        <button
          @click="toggleDarkMode"
          class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-r from-yellow-500 to-orange-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105"
          :title="darkModeStore.isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
        >
          <BaseIcon
            :path="darkModeStore.isDark ? mdiWeatherSunny : mdiWeatherNight"
            size="20"
          />
        </button>

        <!-- User Profile & Logout -->
        <div class="flex items-center space-x-3">
          <!-- User Avatar & Name -->
          <div class="flex items-center space-x-3 bg-white/50 dark:bg-slate-700/50 px-4 py-2 rounded-xl backdrop-blur-sm border border-white/20 dark:border-slate-600/20">
            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
              <BaseIcon
                :path="mdiAccount"
                size="16"
                class="text-white"
              />
            </div>
            <div class="hidden sm:block">
              <div class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                {{ user.name || 'Admin' }}
              </div>
              <div class="text-xs text-gray-500 dark:text-gray-400">
                {{ user.email || 'admin@exness.com' }}
              </div>
            </div>
          </div>

          <!-- Logout Button -->
          <button
            @click="logout"
            class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-r from-red-500 to-pink-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105"
            title="Logout"
          >
            <BaseIcon
              :path="mdiLogout"
              size="20"
            />
          </button>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
/* Smooth transitions */
* {
  transition: all 0.3s ease;
}

/* Enhanced shadows */
.shadow-xl {
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.shadow-2xl {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

/* Hover effects */
button:hover {
  transform: translateY(-2px);
}

/* Glass morphism effect */
.backdrop-blur-sm {
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
}
</style> 