const cursor = document.querySelector('.cursor');
//var timeout;
const listitems = document.querySelectorAll('a');


//Mouse takibi
if(window.screen.width >= 620)
{
   document.addEventListener('mousemove' , (e) =>
   {
   let x = e.pageX;
   let y = e.pageY;

   cursor.style.top = y + "px";
   cursor.style.left = x + "px";
   cursor.style.display = 'block';
   //mouse durduruldu efekti
   /*function mouseStopped()
   {
      cursor.style.display = 'none';
   }
   clearTimeout(timeout);
   timeout = setTimeout(mouseStopped , 1000);*/
   });
}
//mouseout efekti
/*document.addEventListener('mouseout' , () =>
{
   cursor.style.display = 'none';
});*/

//animasyon
listitems.forEach((item,index) =>
{
   item.style.animation = `movedown 0.65s ease-in-out forwards ${index / 5}s`;
})

var studiebtn = document.getElementById("studiebtn");
var studiebtn2 = document.getElementById("studiebtn2");
const links = document.getElementById('links');
const profileinf = document.getElementById('profile-inf');
const profileimg = document.getElementById('profile-img');
const profileimgin = document.getElementById('profile-img-in');
const profileborder = document.getElementById('profile-border');
const profilenav = document.getElementById('profile-nav');
const profileinfh4 = document.getElementById('title4');
const studies = document.getElementById('studies');

const directChildren = studies.children.length;
const children = directChildren * 90;
console.log(directChildren);
console.log(children);

function studiesopen()
{
   studiebtn.classList.add('active');
   studiebtn2.classList.remove('active');
   
   links.style.height = children+"px";
   links.style.maxHeight = '470px';
   links.style.overflowY = 'scroll';
   profileinf.style.paddingTop = '10px';
   profileinf.style.top = '19%';
   profileimg.style.bottom = '16px';
   profileborder.style.padding = '0';
   profileimg.style.width = '200px';
   profileimg.style.height = '200px';
   profileimg.style.borderRadius = '25%';
   profileimgin.style.borderRadius = '25%';
   profilenav.style.paddingBottom = '0';
   profileinfh4.style.paddingBottom = '10px';
   
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
}