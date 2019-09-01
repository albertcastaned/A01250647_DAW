import React from 'react';
import { Switch, Route } from 'react-router-dom';
import Home from './components/Home';
import PokeInfo from './containers/PokeInfoContainer';

const Routes = () => {
    return(
        <Switch>
            <Route exact path="/" component={Home} />
            <Route exact path="/info/:pokeIndex" component={PokeInfo} />
        </Switch>
    );
}

export default Routes;