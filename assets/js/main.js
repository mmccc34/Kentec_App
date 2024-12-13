import './../styles/scss/main.scss';
import { addTask, createTask } from './function.js';
let task2=createTask('blue',1.5,"ma tache");
addTask(task2,"row3",2);
let task3=createTask('green',2.5,"ma tache3");
addTask(task3,"row1",1);
let task4=createTask('purple',3.5,'la tache de val');
let task5=createTask('green',2.5,'la deuxieme tache de val');
addTask(task4,"row2",1);
addTask(task5,"row2",1);


