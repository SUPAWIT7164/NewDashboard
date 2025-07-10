<script setup>
import { Link } from '@inertiajs/vue3'
import { computed, reactive } from 'vue'
import { usePage } from '@inertiajs/vue3'

let breadcrumbs = reactive({})
breadcrumbs = computed(() => usePage().props.navigation.breadcrumbs)

</script>

<template>
  <nav data-v-d6c697c0="" class="fixed top-16 left-0 right-0 z-20 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-slate-800 dark:to-slate-900 h-16 border-b border-blue-200 dark:border-slate-700 shadow-lg backdrop-blur-sm">
    <div data-v-d6c697c0="" class="flex items-center justify-between h-16 px-6">
      <!-- Desktop Navigation -->
      <div data-v-d6c697c0="" class="hidden lg:flex items-center space-x-2">
        <!-- Dashboard -->
        <a data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg" href="/admin">
          <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
            <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
              <path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z"></path>
            </svg>
          </span>
          <span data-v-d6c697c0="" class="ml-2">Dashboard</span>
        </a>

        <!-- Report Dropdown -->
        <div data-v-d6c697c0="" class="relative">
          <button data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50">
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M22,21H2V3H4V19H6V10H10V19H12V6H16V19H18V14H22V21Z"></path>
              </svg>
            </span>
            <span data-v-d6c697c0="" class="ml-2">Report</span>
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 ml-1 flex-shrink-0 transition-transform duration-300">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
              </svg>
            </span>
          </button>
        </div>

        <!-- Report1 Dropdown -->
        <div data-v-d6c697c0="" class="relative">
          <button data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50">
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M22,21H2V3H4V19H6V10H10V19H12V6H16V19H18V14H22V21Z"></path>
              </svg>
            </span>
            <span data-v-d6c697c0="" class="ml-2">Report1</span>
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 ml-1 flex-shrink-0 transition-transform duration-300">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
              </svg>
            </span>
          </button>
        </div>

        <!-- Report2 Dropdown -->
        <div data-v-d6c697c0="" class="relative">
          <button data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50">
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M22,21H2V3H4V19H6V10H10V19H12V6H16V19H18V14H22V21Z"></path>
              </svg>
            </span>
            <span data-v-d6c697c0="" class="ml-2">Report2</span>
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 ml-1 flex-shrink-0 transition-transform duration-300">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
              </svg>
            </span>
          </button>
        </div>

        <!-- XM Report Button -->
        <a data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50" href="/admin/xm">
          <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
            <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
              <path fill="currentColor" d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M9 17H7V10H9V17M13 17H11V7H13V17M17 17H15V13H17V17Z"></path>
            </svg>
          </span>
          <span data-v-d6c697c0="" class="ml-2">XM Report</span>
        </a>

        <!-- Other existing buttons -->
        <a data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50" href="/admin/rebate">
          <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
            <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
              <path fill="currentColor" d="M5,6H23V18H5V6M14,9A3,3 0 0,1 17,12A3,3 0 0,1 14,15A3,3 0 0,1 11,12A3,3 0 0,1 14,9M9,8A2,2 0 0,1 7,10V14A2,2 0 0,1 9,16H19A2,2 0 0,1 21,14V10A2,2 0 0,1 19,8H9M1,10H3V20H19V22H1V10Z"></path>
            </svg>
          </span>
          <span data-v-d6c697c0="" class="ml-2">Rebate</span>
        </a>

        <a data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50" href="/admin/promo">
          <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
            <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
              <path fill="currentColor" d="M9.06,1.93C7.17,1.92 5.33,3.74 6.17,6H3A2,2 0 0,0 1,8V10A1,1 0 0,0 2,11H11V8H13V11H22A1,1 0 0,0 23,10V8A2,2 0 0,0 21,6H17.83C19,2.73 14.6,0.42 12.57,3.24L12,4L11.43,3.22C10.8,2.33 9.93,1.94 9.06,1.93M9,4C9.89,4 10.34,5.08 9.71,5.71C9.08,6.34 8,5.89 8,5A1,1 0 0,1 9,4M15,4C15.89,4 16.34,5.08 15.71,5.71C15.08,6.34 14,5.89 14,5A1,1 0 0,1 15,4M2,12V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V12H13V20H11V12H2Z"></path>
            </svg>
          </span>
          <span data-v-d6c697c0="" class="ml-2">Promo</span>
        </a>

        <a data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50" href="/admin/referral">
          <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
            <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
              <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z"></path>
            </svg>
          </span>
          <span data-v-d6c697c0="" class="ml-2">Referral Agent</span>
        </a>

        <!-- Support Dropdown -->
        <div data-v-d6c697c0="" class="relative">
          <button data-v-d6c697c0="" class="flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 hover:bg-white/50 dark:hover:bg-slate-700/50">
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 flex-shrink-0">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M15.07,11.25L14.17,12.17C13.45,12.89 13,13.5 13,15H11V14.5C11,13.39 11.45,12.39 12.17,11.67L13.41,10.41C13.78,10.05 14,9.55 14,9C14,7.89 13.1,7 12,7A2,2 0 0,0 10,9H8A4,4 0 0,1 12,5A4,4 0 0,1 16,9C16,9.88 15.64,10.67 15.07,11.25M13,19H11V17H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path>
              </svg>
            </span>
            <span data-v-d6c697c0="" class="ml-2">Support</span>
            <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6 ml-1 flex-shrink-0 transition-transform duration-300">
              <svg viewBox="0 0 24 24" width="18" height="18" class="inline-block">
                <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
              </svg>
            </span>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation -->
      <div data-v-d6c697c0="" class="flex lg:hidden items-center justify-between w-full">
        <button data-v-d6c697c0="" class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
          <span data-v-d6c697c0="" class="inline-flex justify-center items-center w-6 h-6">
            <svg viewBox="0 0 24 24" width="20" height="20" class="inline-block">
              <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"></path>
            </svg>
          </span>
        </button>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Breadcrumb'
}
</script>