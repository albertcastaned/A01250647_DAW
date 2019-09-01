import React, { Component } from 'react';
import Navbar from '../components/Navbar';
import PokemonDetalle from '../components/PokemonDetalle';
import axios from 'axios';


class PokeInfoContainer extends Component {

    state = {
        pokeData: []
    }
    componentDidMount()
    {
        axios.get('https://pokeapi.co/api/v2/pokemon/' + this.props.match.params.pokeIndex)
        .then(result => 
            {
                console.log(result.data);
                 this.setState({
                    pokeData: result.data
                })

            }
        )
        .catch(error => console.log(error));
    }
    render(){

        let {pokeData} = this.state;

        if (pokeData.length === 0) {
            console.log("returned null");
            return null;
          }
        

        console.log(pokeData.types);
        return(
        <div>
            <Navbar/>
            <PokemonDetalle nombre={pokeData.name} id={pokeData.id} types={pokeData.types} stats={pokeData.stats}/>
        </div>
        
        );
    }
}
export default PokeInfoContainer;