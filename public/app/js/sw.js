// Service Worker Minimal - Network Only
console.log('PWA Active - Always Online');

// Install
self.addEventListener('install', e => {
  console.log('PWA Installed');
  self.skipWaiting();
});

// Activate
self.addEventListener('activate', e => {
  console.log('PWA Activated');
  e.waitUntil(self.clients.claim());
});

// Fetch - Selalu dari Network
self.addEventListener('fetch', e => {
  // Lewati semua, biarkan browser handle
  return;
});