<?php
// Le .htaccess DOIT contenir la chaîne :
// SetEnv ENV_HTACCESS_READING true

if (array_key_exists ('ENV_HTACCESS_READING', $_SERVER))
{
    echo "Yes ! .htaccess is read and used !!\n";
}
else
{
    echo "BAD : The .htaccess is not read : add 'AllowOverride All' in your Apache configuration\n";
}