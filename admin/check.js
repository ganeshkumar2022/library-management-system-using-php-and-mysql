function fun1(x)
    {
        if(x.length==0)
        {
            document.getElementById("check1").innerHTML="";
        }
        else
        {
            const xhttp=new XMLHttpRequest();
            xhttp.onload=function()
            {
                document.getElementById("check1").innerHTML=this.responseText;
            }
            xhttp.open("GET","http://localhost/library/admin/getid.php?id="+x);
            xhttp.send();
        }

    }
    function fun2(x)
    {
        if(x.length==0)
        {
            document.getElementById("check2").innerHTML="";
        }
        else
        {
            const xhttp=new XMLHttpRequest();
            xhttp.onload=function()
            {
                document.getElementById("check2").innerHTML=this.responseText;
            }
            xhttp.open("GET","http://localhost/library/admin/getbook.php?id="+x);
            xhttp.send();
        }

    }