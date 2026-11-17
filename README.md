# Dzencode — Vue SPA + Laravel API

```text
app/
  backend/       Laravel 12, PHP 8.4, REST API
  frontend/      Vue 3, Vite, JavaScript
server/
  docker-compose.yaml
  php/           PHP-FPM и Composer
  nginx/         HTTPS и reverse proxy
  centrifugo/    WebSocket-сервер
```

## Адреса

- https://dzencode.loc.com — Vue SPA. Стартовая страница проверяет подключение к Laravel.
- https://dzencode.loc.com/api/health — JSON от Laravel.
- https://dzencode.loc.com/api/up — встроенная проверка запуска Laravel.
- https://dzencode.loc.com/healthz — проверка Nginx.
- wss://dzencode.loc.com/connection/websocket — Centrifugo, нужна JWT-интеграция.
- http://localhost:15672 — RabbitMQ Management, учётные данные из `server/.env`.
