var webStorage = {};
webStorage.indexedDB = {};
//namespace to encapsulate the database logic

webStorage.indexedDB.open = function(){
	var version = 1;
	var request = indexedDB.open("todos", version);
	
	request.onupgradedneeded = function(e){
		var db = e.target.result;
		
		// A versionchange transaction is started automatically.
		e.target.transaction.onerrer = webStorage.indexedDB.onerror;
		
		if(db.objectStoreNames.contains("todo")){
			db.deleteObjectStore("todo");
		}
		
		var store = db.createObjectStore("todo", {keyPath: "timeStamp"});
	};
	
	request.onsuccess = function(e){
		webStorage.indexedDB.db = e.target.result;
		webStorage.indexedDB.getAllTodoItems();
		//do some more stuff in a minute
	};
	
	webStorage.indexedDB.addTodo = function(todoText){
		var db = webStorage.indexedDB.db;
		var trans = db.transaction(['todo'], "readwrite");
		var store = trans.objectStore("todo");
		var request = store.put({
			"text": todoText,
			"timeStamp": new Date().getTime()
		});
		
		request.onsuccess = function(e){
			// Re-render all the todos
			webStorage.indexedDB.getAllTodoItems();
		};
		
		request.onerror = function(e){
			console.log(e.value);
		};
	};
	
	webStorage.indexedDB.getAllTodoItems = function(){
		var todos = document.getElementById("todoItems");
		todos.innerHTML = "";
		
		var db = webStorage.indexedDB.db;
		var trans = db.transaction(['todo'], "readwrite");
		var store = trans.objectStore("todo");
		
		//Get everything in the store
		var keyRange = IDBKeyRange.lowerBound(0);
		var cursorRequest = store.openCursor(keyRange);
		
		cursorRequest.onsuccess = function (e) {
		  var result = e.target.result;
		  if(!!result == false) 
		   return;
		  
		  renderTodo(result.value);
		  result.continue();
		};
	};
	
	request.onerror = webStorage.indexedDB.onerror;
	//opened a database called "todos" and assigned it to our variable db in the
	//webStorage.indexedDB object.  We can now use this to refere to our DB througout
	//this tutorial.
	
	//CREATE AN OBJECT STORE
	/*
	 * you can only create object stores inside a "versionchange" transaction.
	 * the only way to start a 'versionchange'	transaction is through the
	 * onupgrade needed callback
	 * 
	 */
	
	 
	
};
