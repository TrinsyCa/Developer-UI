    const preloader = document.getElementById("preloader");
    const preloaderimg = document.getElementById("preloaderimg");
    const body = document.querySelector("body");
    function delay(time) 
    {
       return new Promise(resolve => setTimeout(resolve, time));
    }
    window.addEventListener('load', function()
    {
       preloaderimg.style.marginTop = "1200px";
       preloaderimg.style.width = "220px";
       preloader.style.opacity = "0";
       delay(300).then(() => body.style.overflow = "auto");
    });
 
    var code = document.querySelector(".code");
    var moreopt = document.querySelector(".more-opt");
    if (code.scrollHeight > 365)
    {
        code.style.paddingBottom = "45px";
        moreopt.style.display = "block";
    }

    var isExpanded = false;

    function toggleText()
    {
        if (!isExpanded)
        {
            fulltext();
        } else {
            lowtext();
        }
    }

    function fulltext() {
        code.style.maxHeight = "max-content";
        moreopt.innerHTML = "<i class='fa-solid fa-caret-up'></i>&nbsp; Daha Az";
        isExpanded = true;
    }

    function lowtext() {
        code.style.maxHeight = "350px";
        moreopt.innerHTML = "<i class='fa-solid fa-caret-down'></i>&nbsp; Daha Fazla";
        isExpanded = false;
    }

    function copyCode()
    {
        var code = document.getElementById("code").innerText;
        const copiedContent = code;
        navigator.clipboard.writeText(copiedContent)
       .then(function() {
        alert("Kodlar Kopyalandı");
        })
        .catch(function() {
            alert("Kodlar Kopyalanamadı");
        });;
        var alert = document.getElementById("alertBox");
        alert.innerHTML = "Kodlar Kopyalandı";
        alert.style.opacity = "1";
        alert.style.top = "50%";
        delay(1300).then(() => alert.style.opacity = "0");
        delay(1300).then(() => alert.style.top = "60%");
    }