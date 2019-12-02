let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

let months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

let monthAndYear = document.getElementById("monthAndYear");

function showCalendar(month, year) {
	let firstDay = new Date(year, month).getDay();
	let daysInMonth = 32 - new Date(year, nonth, 32).getDate();

	let tbl=document.getElementById("calendar-body");
	table.innetHTML=""
	monthAndYear.innerHTML = months[month] + " " + year
	let date = 1;
  for(let i = 0; i < 6; i++){
	let row = document.createElement("tr")
a
    for(let j = 0; j < 7; j++){
	let cell=document.createElement("td");
	if(i == 0 && j< firstDay){
	  let cellText = document.createTextMode("");
	   cell.appendChild(cellText);
	  row.appendChild(cell);
	}
	else if(date > daysInMonth){
	  break;
	}
	else{
	  let cellText = document.createElement(date);
	  cell.appendChild(cellText);
	  row.appendChild(cell);
	}
	date ++
    }
    tbl.appendChild(row);
  }
}

function previous() {
	currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
	currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
	showCalendar(currentMonth, currentYear);
}

function next() {
	currentYear=currentMonth === 11 ? currentYear + 1 : currentYear;
        currentMonth=(currentMonth + 1) % 12;
        showCalendar(currentMonth, currentYear);
}



