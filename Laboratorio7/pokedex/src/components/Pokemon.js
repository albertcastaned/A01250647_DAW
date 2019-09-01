import React from 'react';
import { Card, CardMedia, CardContent, CardActionArea, Typography } from '@material-ui/core';
import { withStyles } from '@material-ui/core/styles';
import { Link } from 'react-router-dom';

function Pokemon({to, id, name, classes, image}){
    return(
        <div>
        <Card className={classes.item}>
        <Link to="/info/1">

            <CardActionArea>
                    <CardMedia className={classes.media} image={image}/>
                    <CardContent>

                        <Typography gutterBottom component="h2" variant="h6" fontWeight="fontWeightBold">
                            #{id}. {name}
                        </Typography>
                    </CardContent>
               
            </CardActionArea>
            </Link>

        </Card>
      </div>
    )
}

export default withStyles({
    
    item:{
        minWidth: "300px",
        textAlign: "center",
        boxSizing: "border-box",
        margin: "2em"
    },

    media:{
        height: "250px"
    }
})(Pokemon);