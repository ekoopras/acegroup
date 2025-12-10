self.addEventListener('install', () => {
    self.skipWaiting();
});

self.addEventListener('activate', () => {
    clients.claim();
});

// Tidak ada cache
self.addEventListener('fetch', event => {
    event.respondWith(fetch(event.request));
});
