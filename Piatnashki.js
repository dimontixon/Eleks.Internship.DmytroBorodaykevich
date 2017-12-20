
(function(){
	
	var state = 1;
	var puzzle = document.getElementById('puzzle');

	// Вирішення пазлу
	solve();
    scramble();
	
	// Відклик при натисненні по пазлах
	puzzle.addEventListener('click', function(e){
		if(state == 1){
			// Включення анімації
			puzzle.className = 'animate';
			shiftCell(e.target);
		}
	});
	
	// Відклик при натисненні на кнопки(Вирішення, Перемішати)
	document.getElementById('solve').addEventListener('click', solve);
	document.getElementById('scramble').addEventListener('click', scramble);

	/** Створення вирішення пазлу **/
	function solve(){
		
		if(state == 0){
			return;
		}
		
		puzzle.innerHTML = '';
		
		var n = 1;
		for(var i = 0; i <= 3; i++){
			for(var j = 0; j <= 3; j++){
				var cell = document.createElement('span');
				cell.id = 'cell-'+i+'-'+j;
				cell.style.left = (j*80+1*j+1)+'px';
				cell.style.top = (i*80+1*i+1)+'px';
				
				if(n <= 15){
					cell.classList.add('number');
					cell.classList.add((i%2==0 && j%2>0 || i%2>0 && j%2==0) ? 'dark' : 'light');
					cell.innerHTML = (n++).toString();
				} else {
					cell.className = 'empty';
				}
				
				puzzle.appendChild(cell);
			}
		}
		
	}

	/** Переміщування клітини у порожню клітину**/
	function shiftCell(cell){
		
		// Перевірка чи вибрана клітина має номер
		if(cell.clasName != 'empty'){
			
			// Отримання порожньої сусідньої клітини
			var emptyCell = getEmptyAdjacentCell(cell);
			
			if(emptyCell){
				// Тимчасові дані
				var tmp = {style: cell.style.cssText, id: cell.id};
				
				// Зміна ID та стилю клітини
				cell.style.cssText = emptyCell.style.cssText;
				cell.id = emptyCell.id;
				emptyCell.style.cssText = tmp.style;
				emptyCell.id = tmp.id;
				
				if(state == 1){
					// Перевірка порядку чисел
					checkOrder();
				}
			}
		}
		
	}

	/** Отримання конкретної комірки за полем та стовпцеп  **/
	function getCell(row, col){
	
		return document.getElementById('cell-'+row+'-'+col);
		
	}

	/** Отримання порожньої клітини **/
	function getEmptyCell(){
	
		return puzzle.querySelector('.empty');
			
	}
	
	/** Отримання порожньої сусідньої клітини, якщо така існує **/
	function getEmptyAdjacentCell(cell){
		
		// Отримання усіх сусідніх клітин
		var adjacent = getAdjacentCells(cell);
		
		// Пошук порожньої клітини
		for(var i = 0; i < adjacent.length; i++){
			if(adjacent[i].className == 'empty'){
				return adjacent[i];
			}
		}
		
		// Порожня клітина не знайдена
		return false;
		
	}

	/** Отримання усіх сусідніх клітин **/
	function getAdjacentCells(cell){
		
		var id = cell.id.split('-');
		
		// Отримання індексу комірки
		var row = parseInt(id[1]);
		var col = parseInt(id[2]);
		
		var adjacent = [];
		
		// Отримання усіх можливих сусідніх клітин
		if(row < 3){adjacent.push(getCell(row+1, col));}			
		if(row > 0){adjacent.push(getCell(row-1, col));}
		if(col < 3){adjacent.push(getCell(row, col+1));}
		if(col > 0){adjacent.push(getCell(row, col-1));}
		
		return adjacent;
		
	}
	
	/** Перевірки чи порядок чисел є правильним **/
	function checkOrder(){
		
		// Перевірка чи порожня клітина є у правильному місці
		if(getCell(3, 3).className != 'empty'){
			return;
		}
	
		var n = 1;
		// Перебирання усіх клітин з перевіркою номерів
		for(var i = 0; i <= 3; i++){
			for(var j = 0; j <= 3; j++){
				if(n <= 15 && getCell(i, j).innerHTML != n.toString()){
					// Порядок не правильний
					return;
				}
				n++;
			}
		}
		
		// Пазл зібрано, пропонування почати заново
		if(confirm('Красава, зібрав пазл! \nХочеш зіграти ше разок?')){
			scramble();
		}
	
	}

	/** Перемішування пазлу **/
	function scramble(){
	
		if(state == 0){
			return;
		}
		
		puzzle.removeAttribute('class');
		state = 0;
		
		var previousCell;
		var i = 1;
		var interval = setInterval(function(){
			if(i <= 100){
				var adjacent = getAdjacentCells(getEmptyCell());
				if(previousCell){
					for(var j = adjacent.length-1; j >= 0; j--){
						if(adjacent[j].innerHTML == previousCell.innerHTML){
							adjacent.splice(j, 1);
						}
					}
				}
				// Отримування випадкової сусідньої клітини та запам'ятовування її для наступної ітерації
				previousCell = adjacent[rand(0, adjacent.length-1)];
				shiftCell(previousCell);
				i++;
			} else {
				clearInterval(interval);
				state = 1;
			}
		}, 5);
	
	}
	
	/** Генерування випадкових чисел **/
	function rand(from, to){

		return Math.floor(Math.random() * (to - from + 1)) + from;

	}

	/** Заборона перетягування та виділення елементів **/
	document.ondragstart = noselect; 
    document.onselectstart = noselect; 
    function noselect() {
		return false;
		}
	
}());
