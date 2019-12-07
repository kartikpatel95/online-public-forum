import React from 'react';
import ReactDOM from 'react-dom';
import App from './App.js';
import { library } from '@fortawesome/fontawesome-svg-core'
import {faCircleNotch} from '@fortawesome/free-solid-svg-icons';
library.add(faCircleNotch);

ReactDOM.render(<App/>, document.getElementById('submission-form'));
