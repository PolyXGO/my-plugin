/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
var registerBlockType = wp.blocks.registerBlockType;
var TextControl = wp.components.TextControl;
registerBlockType('my-plugin/custom-block', {
  title: 'My Custom Block',
  icon: 'admin-post',
  category: 'common',
  attributes: {
    content: {
      type: 'string',
      "default": 'Hello, World!'
    }
  },
  edit: function edit(props) {
    return /*#__PURE__*/React.createElement(TextControl, {
      value: props.attributes.content,
      onChange: function onChange(content) {
        return props.setAttributes({
          content: content
        });
      }
    });
  },
  save: function save(props) {
    return /*#__PURE__*/React.createElement("p", null, props.attributes.content);
  }
});
/******/ })()
;