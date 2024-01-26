//_____ Side menu dropdown start _____//
let side_item = document.querySelectorAll('.dropdown');
for(let i=0; i<side_item.length; i++) {
	side_item[i].addEventListener('click', ()=> {
		let dropdown_item = document.querySelectorAll('.dropdown-item');
		let right_icon = document.querySelectorAll('.right-icon');
		dropdown_item[i].classList.toggle('active');
		right_icon[i].classList.toggle('active');
	})
}
//_____ Side menu dropdown end _____//