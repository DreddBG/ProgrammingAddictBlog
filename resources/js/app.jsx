import React, { Component } from 'react';
import { BrowserRouter, Switch, Route } from 'react-router-dom'
import ReactDOM from 'react-dom';
import Dashboard from './components/dashboard'
import CreateProject from './components/createproject'
import Navbar from './components/navbar'
 
export default class App extends Component {
    render() {
       return (
        <BrowserRouter>
            <div className="App">
            <Navbar />
            <Switch>
                <Route exact path='/'component={Dashboard} />
                <Route path='/create' component={CreateProject} />
            </Switch>
            </div>
        </BrowserRouter>
       );
    }
}
 
if (document.getElementById('reactapp')) {
    console.log("App Mounted")
    ReactDOM.render(<App/>, document.getElementById('reactapp'));
}