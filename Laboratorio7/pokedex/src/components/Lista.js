import React from 'react';
import Pokemon from './Pokemon';
import { Grid } from '@material-ui/core';


function Lista({ pokedata }) {
    return(
        <div style={{ marginTop: 20, padding: 30 }}>

            <Grid container spacing={2} justify="center">
                {pokedata.map((pokemon, index)=> {
                    
                    let imagenUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/";
                    let pokeIndex = pokemon.url.split('/')[pokemon.url.split('/').length - 2];
                    let pokeName = pokemon.name;

                    return <Pokemon to={`/info/${pokeIndex}`} key={pokemon.name} id={pokeIndex} name={pokeName.toUpperCase()} image={`${imagenUrl}${pokeIndex}.png?raw=true`}/>
                })}
            </Grid>
        </div>
    );
}
export default Lista;