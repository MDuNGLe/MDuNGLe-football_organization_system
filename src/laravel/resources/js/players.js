import {Droppable} from '@shopify/draggable';

const droppable = new Droppable(document.querySelectorAll('.container'), {
  draggable: '.item',
  dropzone: '.dropzone',
});

droppable.on('droppable:dropped', () => console.log('droppable:dropped'));
droppable.on('droppable:returned', () => console.log('droppable:returned'));