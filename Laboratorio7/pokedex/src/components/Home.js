import React, { Component } from 'react';
import Navbar from './Navbar';
import PokeContainer from '../containers/PokeContainer';

class Home extends Component {
  render(){
    return (
      <div>
        <Navbar />
        <PokeContainer />
      </div>
    );
  }
}

export default Home;