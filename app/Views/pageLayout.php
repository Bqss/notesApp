<!DOCTYPE html>
<html lang="en" x-data="{ isDark : JSON.parse(localStorage.getItem('dark') || 'true' )}" x-init="$watch('isDark', value => {localStorage.setItem('dark',JSON.stringify(value))});  "  >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/dist/style.css">
    <script src="/dist/script.js" defer></script>
</head>
<body class="font-nunito antialiased" :class=" isDark ? 'dark bg-primary-dark' : 'bg-primary-light'">

    <div class=" w-11/12 max-w-[60rem] mx-auto">
        <?= $this->include('template/navbar')?>
        <?= $this->renderSection('content')?>
    </div>

    
</body>
</html>