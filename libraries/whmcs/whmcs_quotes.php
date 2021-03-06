<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* WHMCS API
*
* @author    Joe Parihar
* @version   v0.0.1
* @copyright 2013
*/


require_once "whmcs_base.php";
class Whmcs_quotes extends WHMCS_Base{	
	
	/**
	* This command is used to create a quote.
	*
	* Parameters:
	*
	* subject - Subject of the quote
	* stage - Draft,Delivered,On Hold,Accepted,Lost,Dead
	* validuntil - In format set in Localisation
	* lineitems - a base64 encoded serialized array containing:
	*		. desc - The line description
	*		. qty - The quantity being quoted
	*		. up - unit price
	*		. discount - discount amount in %
	*		. taxable - true or false
	*
	* Optional Parameters:
	* 
	* datecreated - Optional - In format set in Localisation
	* customernotes - notes that are viewable by the client
	* adminnotes - notes that are admin only
	* userid - the unique id number of the client in the tblclients table
	* firstname - optional - only required if userid is not specified
	* lastname - optional - only required if userid is not specified
	* companyname - optional - only required if userid is not specified
	* email - optional - only required if userid is not specified
	* address1 - optional - only required if userid is not specified
	* address2 - optional - only required if userid is not specified
	* city - optional - only required if userid is not specified
	* state - optional - only required if userid is not specified
	* postcode - optional - only required if userid is not specified
	* country - optional - only required if userid is not specified
	* phonenumber - optional - only required if userid is not specified
	* currency - optional - only required if userid is not specified
	*
	* See:
	*
	* http://docs.whmcs.com/API:Create_Quote
	*/

	public function  whmcs_create_quote($params = array()) {
		$params['action'] = 'createquote';
		return Whmcs_base::send_request($params);
	}

	// --------------------------------------------------------------------
	
	/**
	* This command is used to update an existing quote.
	*
	* Parameters:
	*
	* quoteid - the id number of the quote in tblquotes
	*
	* Optional Parameters:
	* 
	* userid - the unique id number of the client in the tblclients table
	* firstname - optional - only required if userid is not specified
	* lastname - optional - only required if userid is not specified
	* companyname - optional - only required if userid is not specified
	* email - optional - only required if userid is not specified
	* address1 - optional - only required if userid is not specified
	* address2 - optional - only required if userid is not specified
	* city - optional - only required if userid is not specified
	* state - optional - only required if userid is not specified
	* postcode - optional - only required if userid is not specified
	* country - optional - only required if userid is not specified
	* phonenumber - optional - only required if userid is not specified
	* currency - optional - only required if userid is not specified
	* subject - Subject of the quote
	* stage - Draft,Delivered,On Hold,Accepted,Lost,Dead
	* validuntil - In format set in Localisation
	* datecreated - Optional - In format set in Localisation
	* customernotes - notes that are viewable by the client
	* adminnotes - notes that are admin only
	* lineitems - a base64 encoded serialized array containing:
	* id - existing lineid only required to update existing lines
	* desc - The line description
	* qty - The quantity being quoted
	* up - unit price
	* discount - discount amount in %
	* taxable - true or false
	*
	* See:
	*
	* http://docs.whmcs.com/API:Update_Quote
	*/

	public function  whmcs_update_quote($params = array()) {
		$params['action'] = 'updatequote';
		return Whmcs_base::send_request($params);
	}

	// --------------------------------------------------------------------
	
	/**
	* This command is used to delete an existing quote.
	*
	* Parameters:
	*
	* quoteid - the id number of the quote in tblquotes
	*
	* Optional Parameters:
	* 
	* none
	*
	* See:
	*
	* http://docs.whmcs.com/API:Delete_Quote
	*/

	public function  whmcs_delete_quote($params = array()) {
		$params['action'] = 'deletequote';
		return Whmcs_base::send_request($params);
	}

	// --------------------------------------------------------------------
	
	/**
	* This command is used to send an existing quote.
	*
	* Parameters:
	*
	* quoteid - the id number of the quote in tblquotes
	*
	* Optional Parameters:
	* 
	* none
	*
	* See:
	*
	* http://docs.whmcs.com/API:Send_Quote
	*/

	public function  whmcs_send_quote($params = array()) {
		$params['action'] = 'sendquote';
		return Whmcs_base::send_request($params);
	}

	// --------------------------------------------------------------------
	
	/**
	* This command is used to accept an existing quote.
	*
	* Parameters:
	*
	* quoteid - the id number of the quote in tblquotes
	*
	* Optional Parameters:
	* 
	* none
	*
	* See:
	*
	* http://docs.whmcs.com/API:Accept_Quote
	*/

	public function  whmcs_accept_quote($params = array()) {
		$params['action'] = 'acceptquote';
		return Whmcs_base::send_request($params);
	}

	// --------------------------------------------------------------------
	
	/**
	* This command is used to get a list of quotes in XML format
	*
	* Parameters:
	*
	* none
	*
	* Optional Parameters:
	* 
	* quoteid - specific quote to obtain
	* userid - obtain quotes for a specific user
	* datecreated - Format YYYYMMDD
	* astmodified - Format YYYYMMDD
	* validuntil - Format YYYYMMDD
	* stage - Specific stage to retrieve quotes for
	* subject - to obtain quotes with a specific subject
	* limitstart - for pagination, specify an ID to start at
	* limitnum - to restrict the number of results returned
	*
	* See:
	*
	* http://docs.whmcs.com/API:Get_Quotes
	*/

	public function  whmcs_get_quotes($params = array()) {
		$params['action'] = 'getquotes';
		return Whmcs_base::send_request($params);
	}
}