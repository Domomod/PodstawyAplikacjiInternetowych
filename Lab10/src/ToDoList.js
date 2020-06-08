import React from "react"
import Task from "./Task"

function ToDoList(props){    
    if(props.tasks.length)
        return <div className="todo-list">{
            props.tasks.map(
                task => <Task task={task} filterOn={props.filterOn} handleChange={props.handleChange}/>
            )
        }</div>
    else
        return <div className="underlined-row">Todo list is empty</div>
}

export default ToDoList
