let bandera = false;
document.getElementById("menu").addEventListener("click",
    function()
    {
        if(bandera==false)
        {
            document.getElementById("navega").style.overflow="inherit";
            
            bandera = true;
        }else
        {
            document.getElementById("navega").style.overflow="hidden";
            bandera = false;
        }

    }
);