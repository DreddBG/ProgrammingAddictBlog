import React, { Component } from 'react';
import ReactDOM from 'react-dom';
 
export default class App extends Component {
    render() {
       return (
           <div>
               <h1>Hello World</h1>
           </div>
       );
    }
}
 
if (document.getElementById('app')) {
    console.log("App Mounted")
    ReactDOM.render(<App/>, document.getElementById('app'));
}