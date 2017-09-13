export  const setValidationErrors = (state,{errors}) => {
     state.validations = errors.errors;
     state.flash = errors.message
};

export const exportSuccessData = (state,response) => {
  console.log(response.data)
};

export const exportUserData = (state,response) => {
    state.userDetails = response;

};