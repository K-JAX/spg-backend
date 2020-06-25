// Exercise block
// import { registerBlockType } from '@wordpress/blocks'
const { registerBlockType } = wp.blocks; 

const blockStyle = {
    backgroundColor: '#900',
    color:  '#fff',
    padding: '20px',
};

registerBlockType( 'spg-block/exercise-block', {
    title: 'Exercise',
    icon: 'share-alt',
    category: 'layout',
    example: {},
    edit() {
        return <div style={ blockStyle }>Hello World, step 1 (from the editor).</div>;
    },
    save() {
        return <div style={ blockStyle }>Hello World, step 1 (from the frontend).</div>;
    },
} );