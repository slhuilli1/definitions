<?php
	defined('_JEXEC') or die('Access deny');

	class plgContentDefinitions extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){	
					$re = '{def}';					
					$doc = JFactory::getDocument();
					$doc->addStyleSheet('plugins/content/definitions/style.css');
					$i=0;
					JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
					$customFields = FieldsHelper::getFields('com_users.user', JFactory::getUser(), true);
					$a = FieldsHelper::getFields('com_content.article', $article);

					$t=array();
					$t = (array)json_decode($a[2]->value);
					$chaine = '<div class="definitions"><div class="titre">Définitions en lien avec le matériel</div>';
					foreach ($t as $maligne){

						$chaine .= '<details>';
						$chaine .= '<summary>'.$maligne->def_mot.'<acronym>'.$maligne->def_acronyme.'</acronym></summary>';
						$chaine .= '<p>';
						$chaine .= $maligne->def_definition;
						$chaine .= '</p>';
						$chaine .= '</details>';
					}
					$chaine .='</div>';
					$i++;
					$article->text = str_replace($re, $chaine,  $article->text);
				}
			
	}


	

