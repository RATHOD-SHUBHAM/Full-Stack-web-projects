import React from 'react';
import {
    Route,
    Redirect
  } from "react-router-dom";

import {isAuthenticate} from "./index"

// we dont need multiple children => we just want component
const AdminRoutes = ({ component: Component, ...rest }) => {
    let auth = isAuthenticate();
    return (
      <Route
        {...rest}
        // we dont want to render location
        render={ props =>
          auth  && auth.user.role === 1 ? (
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

export default AdminRoutes;
