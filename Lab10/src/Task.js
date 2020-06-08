import React, { Component } from 'react';

function Task(props){
    const hidden = {
        display:"none",
    }

    return(
        <div 
            style={props.filterOn && props.task.done ? hidden : null}
            className="todo-item"
        >
            <input 
                type="checkbox" 
                checked={props.task.done}
                onChange={() => props.handleChange(props.task.id)}
            />
            <p className={props.task.done? "completed": null}> 
                {props.task.text} 
            </p>
        </div>
    )
}
        

export default Task;
