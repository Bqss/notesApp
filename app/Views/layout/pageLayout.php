<!DOCTYPE html>
<html lang="en"   >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/dist/style.css">
    <script src="/dist/script.js" defer></script>
</head>
<body 
class="font-nunito antialiased"
 x-data :class="$store.theme.isDark ? 'dark bg-primary-dark' : 'bg-primary-light' " 
 x-init="$store.theme.init() ; $watch('$store.theme.isDark', value => $store.theme.update(value))">
    <div class=" w-11/12 max-w-[60rem] mx-auto">
        <?= $this->include('layout/navbar')?>
        <?= $this->renderSection('content')?>
    </div>

    
</body>
</html>