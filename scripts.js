const preloader = document.getElementById("preloader");
const preloaderimg = document.getElementById("preloaderimg");

function delay(time) {
   return new Promise(resolve => setTimeout(resolve, time));
 }
delay(400).then(() => preloaderimg.style.opacity = "1");
window.addEventListener('load', function()
{
   delay(700).then(() => preloaderimg.style.marginTop = "1200px");
   delay(700).then(() => preloaderimg.style.width = "220px");
   delay(700).then(() => preloader.style.opacity = "0");
});

const listitems = document.querySelectorAll('a');

//animasyon
listitems.forEach((item,index) =>
{
   delay(1300).then(() => item.style.animation = `moveup 0.6s ease-in-out forwards ${index / 5}s`);
})

var studiebtn = document.getElementById("studiebtn");
var studiebtn2 = document.getElementById("studiebtn2");
const links = document.getElementById('links');
const profileinf = document.getElementById('profile-inf');
const profileimg = document.getElementById('profile-img');
const profileimgin = document.getElementById('profile-img-in');
const profileborder = document.getElementById('profile-border');
const profilenav = document.getElementById('profile-nav');
const profileinfh4 = document.getElementById('title-4');
const studies = document.getElementById('studies');

const directChildren = studies.children.length;
const children = directChildren * 90;

function studiesopen()
{
   studiebtn.classList.add('active');
   studiebtn2.classList.remove('active');
   
   links.style.height = children+"px";
   links.style.maxHeight = '470px';
   links.style.overflowY = 'overlay';
   profileinf.style.paddingTop = '10px';
   profileinf.style.top = '19%';
   profileimg.style.bottom = '16px';
   profileborder.style.padding = '4px';
   profileimg.style.width = '200px';
   profileimg.style.height = '200px';
   profileimg.style.borderRadius = '25%';
   profileimgin.style.borderRadius = '25%';
   profilenav.style.paddingBottom = '0';
   profileinfh4.style.paddingBottom = '0';
}
function studiesclose()
{
   studiebtn.classList.remove('active');
   studiebtn2.classList.add('active');
   links.style.height = '';
      links.style.maxHeight = '';
      links.style.overflowY = '';
      profileinf.style.paddingTop = '';
      profileinf.style.top = '';
      profileimg.style.bottom = '';
      profileborder.style.padding = '';
      profileimg.style.width = '';
      profileimg.style.height = '';
      profileimg.style.borderRadius = '';
      profileimgin.style.borderRadius = '';
      profilenav.style.paddingBottom = '';
      profileinfh4.style.paddingBottom = '';
      links.scrollTo(0 , 0);
   if(screen.width <= 350)
   {
      links.style.height = '170px';
   }
}