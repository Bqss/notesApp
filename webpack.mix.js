const mix = require('laravel-mix');
mix.css("./app/style/style.css", "dist").setPublicPath('public')
mix.js('./app/script','dist').setPublicPath("public")