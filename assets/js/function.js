export function createTask(color,length,content){
    let task=document.createElement("div");
    task.className = "border task"
    task.textContent=content
    task.style.backgroundColor=color;
    task.style.margin='5px 0';
    task.style.width=`${length * 100}%`;
    return task;
}
export function addTask(task,idRow,column){
    let row=document.querySelector(`#${idRow}>div:nth-child(${column+1})`);
    row.append(task);
}
