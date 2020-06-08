import React from 'react';

function NewTask(props){
        //Static variable
        if(typeof NewTask.counter == 'undefined'){
            NewTask.counter = 0;
        }
        
        const pushNewTask = () => {
            const name = document.getElementById('new-task-name').value
            document.getElementById('new-task-name').value = ""

            if( name ){
                props.handlePush(
                    {
                        id: NewTask.counter++,
                        text: name,
                        done: false,
                    }
                )
            }
        }

        return(
            <div className="underlined-row">
                <input
                    className="input-text"
                    id="new-task-name"
                    type="text"
                    onKeyPress={event => {
                            if (event.key === 'Enter') {
                                pushNewTask()
                            }
                        }}
        
                />
                <input 
                    type="button"
                    value="Add"
                    onClick={pushNewTask}
                />
            </div>
        )
}

export default NewTask;