<?php

require_once 'config.php';
use \LoginRadiusSDK\CustomerRegistration\Account\SottAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\MultiFactorAuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\AuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\PasswordLessLoginAPI;
use \LoginRadiusSDK\LoginRadiusException;

function loginByEmail(array $request)
{
    $email = isset($request['email']) ? trim($request['email']) : '';
    $password = isset($request['password']) ? trim($request['password']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($email) || empty($password)) {
        $response['message'] = 'Email Id and Password are required fields.';
    } else {
        $authenticationObj = new AuthenticationAPI();
        $loginByEmailAuthenticationModel = array('email' => $email, 'password' => $password);
        $result = $authenticationObj->loginByEmail($loginByEmailAuthenticationModel);
        if (isset($result->access_token) && $result->access_token != '') {
            $response['data'] = $result;
            $response['message'] = "Logged in successfully";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        }

    }
    return json_encode($response);
}

function getProfile(array $request)
{
    $token = isset($request['token']) ? trim($request['token']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($token)) {
        $response['message'] = 'Access Token is a required field.';
    } else {
        $authenticationObj = new AuthenticationAPI();
        $fields = ''; 
        $emailTemplate = ''; 
        $verificationUrl = '';  
        $welcomeEmailTemplate = ''; 
        $result = $authenticationObj->getProfileByAccessToken($token, $fields, $emailTemplate, $verificationUrl, $welcomeEmailTemplate);
        if ((isset($result->EmailVerified) && $result->EmailVerified) || AUTH_FLOW == 'optional' || AUTH_FLOW == 'disabled') {
            $response['data'] = $result;
            $response['message'] = "Profile successfully retrieved.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        } else {
            $response['message'] = "Email is not verified.";
            $response['status'] = 'error';
        }

    }
    return json_encode($response);
}

function registration(array $request)
{
    $email = isset($request['email']) ? trim($request['email']) : '';
    $password = isset($request['password']) ? trim($request['password']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($email) || empty($password)) {
        $response['message'] = 'Email Id and Password are required fields.';
    } else {
        $authenticationObj = new AuthenticationAPI();
        $userprofileModel = array('Email' => array(array('Type' => 'Primary', 'Value' => $email)), 'password' => $password);
        $sottObj = new SottAPI();
        $sott = $sottObj->generateSott(10);

        if (!is_object($sott)) {
            $sott = json_decode($sott);
        }
        $emailTemplate = '';
        $fields = "";
        $options="";
        $verificationUrl = $request['verificationurl'];
        $welcomeEmailTemplate = '';
        $result = $authenticationObj->userRegistrationByEmail($userprofileModel, $sott->Sott, $emailTemplate, $fields,$options, $verificationUrl, $welcomeEmailTemplate);
        if ((isset($result->EmailVerified) && $result->EmailVerified) || AUTH_FLOW == 'optional' || AUTH_FLOW == 'disabled') {
            $response['result'] = $result;
            $response['message'] = "Successfully registered.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        } else {
            $response['message'] = "Successfully registered, please check your email to verify your account.";
            $response['status'] = 'registered';
        }

    }
    return json_encode($response);
}

function pwLessLogin(array $request)
{
    $email = isset($request['email']) ? trim($request['email']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($email)) {
        $response['message'] = 'Email Id is a required field.';
    } else {
        $authenticationObj = new PasswordLessLoginAPI();
        $verificationUrl = $request['verificationurl'];
        $passwordLessLoginTemplate = '';
        $result = $authenticationObj->passwordlessLoginByEmail($email, $passwordLessLoginTemplate, $verificationUrl);
        if ((isset($result->IsPosted) && $result->IsPosted)) {
            $response['message'] = "One time login link has been sent to your provided email id, check email for further instruction.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        }

    }
    return json_encode($response);
}

function forgotPassword(array $request)
{
    $email = isset($request['email']) ? trim($request['email']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($email)) {
        $response['message'] = 'Email Id is a required field.';
    } else {
        $authenticationObj = new AuthenticationAPI();

        $result = $authenticationObj->forgotPassword($email, $request['resetPasswordUrl'], '');
        if ((isset($result->IsPosted) && $result->IsPosted)) {
            $response['message'] = "An email has been sent to your address with instructions to reset your password.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        }
    }
    return json_encode($response);
}

function resetPassword(array $request)
{
    $token = isset($request['resettoken']) ? trim($request['resettoken']) : '';
    $password = isset($request['password']) ? trim($request['password']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($token) || empty($password)) {
        $response['message'] = 'Password are required fields.';
    } else {
        $authenticationObj = new AuthenticationAPI();

        $formData = ['resettoken' => $token, 'password' => $password, 'welcomeEmailTemplate' => '', 'resetPasswordEmailTemplate' => ''];
        $result = $authenticationObj->resetPasswordByResetToken($formData);
        if ((isset($result->IsPosted) && $result->IsPosted)) {
            $response['message'] = "Password has been reset successfully.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        }

    }
    return json_encode($response);
}

function pwLessLinkVerify(array $request)
{
    $verificationToken = isset($request['token']) ? trim($request['token']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($verificationToken)) {
        $response['message'] = 'Token is a required field.';
    } else {
        $authenticationObj = new PasswordLessLoginAPI();

        $fields = '';
        $welcomeEmailTemplate = '';
        $result = $authenticationObj->passwordlessLoginVerification($verificationToken, $fields, $welcomeEmailTemplate);
        if ((isset($result->access_token) && $result->access_token != '')) {
            $response['data'] = $result;
            $response['message'] = "Link successfully verified.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        }

    }
    return json_encode($response);
}

function emailVerify(array $request)
{
    $vtoken = isset($request['vtoken']) ? trim($request['vtoken']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($vtoken)) {
        $response['message'] = 'Verification Token is a required field.';
    } else {
        $authenticationObj = new AuthenticationAPI();
        $result = $authenticationObj->verifyEmail($vtoken);
        if ((isset($result->IsPosted) && $result->IsPosted)) {
            $response['message'] = "Your email has been verified successfully.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        }

    }
    return json_encode($response);
}

function mfaLogin(array $request)
{
    $email = isset($request['email']) ? trim($request['email']) : '';
    $password = isset($request['password']) ? trim($request['password']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($email) || empty($password)) {
        $response['message'] = 'Email Id and Password are required fields.';
    } else {
        $authenticationObj = new MultiFactorAuthenticationAPI();
        $payload = array('email' => $email, 'password' => $password);
        $emailTemplate = '';
        $fields = '';
        $loginUrl = '';
        $smsTemplate = '';
        $smsTemplate2FA = '';
        $verificationUrl = '';
        $emailTemplate2FA = '';
        $result = $authenticationObj->mfaLoginByEmail($email, $password, $emailTemplate, $fields, $loginUrl, $smsTemplate, $smsTemplate2FA, $verificationUrl, $emailTemplate2FA);
     
        if (isset($result->Profile) || isset($result->SecondFactorAuthentication)) {
            $response['data'] = $result;
            $response['message'] = "Successful MFA Login.";
            $response['status'] = 'success';
        } else if (isset($result->error_response)) {
            $response['message'] = $result->error_response->Description;
            $response['status'] = "error";
        }
    }
    return json_encode($response);
}

function mfaValidate(array $request)
{
    $secondFactorAuthenticationToken = isset($request['secondFactorAuthenticationToken']) ? trim($request['secondFactorAuthenticationToken']) : '';
    $googleAuthCode = isset($request['googleAuthCode']) ? trim($request['googleAuthCode']) : '';
    $response = array('status' => 'error', 'message' => 'An error occurred.');
    if (empty($secondFactorAuthenticationToken)) {
        $response['message'] = 'Second Factor Auth Token is a required field.';
    } else if (empty($googleAuthCode)) {
        $response['message'] = 'Google Auth Code is a required field.';
    } else {
        $authenticationObj = new MultiFactorAuthenticationAPI();
            $fields = '';
            $rbaBrowserEmailTemplate = '';  
            $rbaCityEmailTemplate = ''; 
            $rbaCountryEmailTemplate = '';  
            $rbaIpEmailTemplate = ''; 
            $result = $authenticationObj->mFAValidateGoogleAuthCode($googleAuthCode, $secondFactorAuthenticationToken, $fields, $rbaBrowserEmailTemplate, $rbaCityEmailTemplate, $rbaCountryEmailTemplate, $rbaIpEmailTemplate);
            if ((isset($result->access_token) && $result->access_token != '')) {
                $response['data'] = $result;
                $response['message'] = "Google Auth Code successfully validated.";
                $response['status'] = 'success';
            }else if (isset($result->error_response)) {
                $response['message'] = $result->error_response->Description;
                $response['status'] = "error";
            }

    }
    return json_encode($response);
}