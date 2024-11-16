// import Tagify from "@yaireo/tagify";
// //
// // // var inputElement22 = document.querySelector('div[id= "tags1"]');
// // // var whitelists = JSON.parse(inputElement22.dataset.whitelist);
// // // console.log(whitelists);
// // var input = document.querySelector('textarea[id=tags2]'),
// //     tagify = new Tagify(input);
// // var input = document.querySelector('textarea[id=tags3]'),
// //     tagify = new Tagify(input);
// // var input = document.querySelector('textarea[id=tags3]'),
// //     tagify = new Tagify(input);
// // var input = document.querySelector('textarea[id=tags2]'),
// //     tagify = new Tagify(input);
// // var input = document.querySelector('textarea[id=tags2]'),
// //     tagify = new Tagify(input);
// // var input = document.querySelector('textarea[id=tags2]'),
// //     tagify = new Tagify(input);
// // // "remove all tags" button event listener
// // // document.querySelector('button[id=remove-all-tags-R]')
// // //     .addEventListener('click', tagify.removeAllTags.bind(tagify))
// //
// // // var input = document.querySelector('textarea[id=tags2]');
// // // var tagify = new Tagify(input, {
// // //     originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
// // // });
// // var input = document.querySelector('textarea[id=tags1]');
// // var tagify = new Tagify(input);
// //
// // // var input = document.querySelector('textarea[id=tags1]');
// // // var tagify = new Tagify(input, {
// // //     originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
// // // });
// //
var input = document.querySelectorAll('textarea[id=tags2]');
input.forEach(function (input) {
    new Tagify(input);
});

// import Tagify from '@yaireo/tagify'
//
// var inputElem = document.querySelector('input') // the 'input' element which will be transformed into a Tagify component
// var tagify = new Tagify(inputElem, {
//     // A list of possible tags. This setting is optional if you want to allow
//     // any possible tag to be added without suggesting any to the user.
//     whitelist: ['foo', 'bar', 'and baz', 0, 1, 2]
// })


// import Tagify from '@yaireo/tagify'

// var inputElem = document.querySelectorAll('textarea[id=tags2]') // the 'input' element which will be transformed into a Tagify component
// var tagify = new Tagify(inputElem, {
//     // A list of possible tags. This setting is optional if you want to allow
//     // any possible tag to be added without suggesting any to the user.
//     // whitelist: ['foo', 'bar', 'and baz', 0, 1, 2]
// })
