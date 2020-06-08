import React, {useState} from 'react';
import ToDoList from './ToDoList';
import NewTask from './NewTask';
import Filter from './Filter';

function App(){
  const [tasks, setTasks] = useState([])
  const [filter, setFilter] = useState(false)

  const filterTasks = () => setFilter(prevFilter => !prevFilter)

  const addTask = (newTask) => setTasks(prevTasks => [...prevTasks, newTask])

  const updateTaskCompletedness = (id) => setTasks(
    prevTasks => prevTasks.map( 
      task => ({
        ...task, 
        done: (task.id === id) !== task.done //XOR
      })
    )
  )

  return(
    <div className="app">
      <Filter handleFilter={filterTasks}/>
      <ToDoList tasks={tasks} handleChange={updateTaskCompletedness} filterOn={filter}/>
      <NewTask handlePush={addTask}/>
    </div>
  )
}
  
export default App;
