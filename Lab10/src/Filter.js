import React from 'react';

function Filter(props){
    return(
        <div className="underlined-row">
            <input
                type="checkbox"
                onChange={() => props.handleFilter()}
            />
            Hide completed tasks
        </div>
    )
}

export default Filter;