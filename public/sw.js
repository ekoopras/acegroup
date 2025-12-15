
self.addEventListener('install', e => {
	console.log('[ServiceWorker] Installer')
	e.waitUntil(
		caches.open(cacheName)
			.then(cache => {
				console.log('[ServiceWorker] Caching cacheFiles')
				cache.addAll(cacheFiles)
			})
			.then(() => self.skipWaiting())
	)
})

self.addEventListener('activate', e => {
	console.log('[ServiceWorker] Activated')
	e.waitUntil(
		caches.keys()
			.then(cacheNames => {
				return Promise.all(
					cacheNames.map(cache => {
						if(cache !== cacheName){
							console.log('[ServiceWorker] Removing Cache File from ', cache)
							return caches.delete(cache)
						}
					})
				)
			})
	)
})

self.addEventListener('fetch', e => {
	console.log('[ServiceWorker] Fetching', e.request.url)
	e.respondWith(
		fetch(e.request).catch(() => caches.match(e.request))
	)
})
