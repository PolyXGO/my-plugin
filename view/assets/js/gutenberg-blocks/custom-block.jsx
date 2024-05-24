const { registerBlockType } = wp.blocks;
const { TextControl } = wp.components;

registerBlockType('my-plugin/custom-block', {
    title: 'My Custom Block',
    icon: 'admin-post',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            default: 'Hello, World!',
        },
    },
    edit: function (props) {
        return (
            <TextControl
                value={props.attributes.content}
                onChange={(content) => props.setAttributes({ content })}
            />
        );
    },
    save: function (props) {
        return <p>{props.attributes.content}</p>;
    },
});
