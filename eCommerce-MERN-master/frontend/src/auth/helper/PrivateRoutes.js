import React from 'react';
import {
    Route,
    Redirect
  } from "react-router-dom";

import {isAuthenticate} from "./index"

// we dont need multiple children => we just want component
const PrivateRoute = ({ component: Component, ...rest }) => {
    let auth = isAuthenticate();
    return (
      <Route
        {...rest}
        // we dont want to render location
        render={ props =>
          auth ? (
            <Component {...props} />
          ) : (
            <Redirect
              to={{
                pathname: "/signin",
                state: { from: props.location }
              }}
            />
          )
        }
      />
    );
  }

export default PrivateRoute;
