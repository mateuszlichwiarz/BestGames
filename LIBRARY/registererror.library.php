 <?php

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
        echo '<div class="content"><h3>Wystąpił błąd. Proszę sprawdzić czy formularz został wypełniony poprawnie. Ewentualnie proszę zmienić nazwę użytkownika.</h3></div>';
    ModuleLoader::load('register');
    ModuleLoader::load('footer');
    ModuleLoader::load('js');
    ModuleLoader::load('close');