<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'test_wp_api');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'f7kj82110l');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '@`]/+2%RAgX3^{Rk88shY%e9)SZPJ#$(jksL tK!CB9v]?t7>_=k.,fD]2|K nF=');
define('SECURE_AUTH_KEY',  '353qs}5KzRLUb9440m-6:Lfbjkp>Tj9K1uU}{wP|(1,(%!&TWB*QrrcieSd}G,9U');
define('LOGGED_IN_KEY',    'K]sb%?Ow=j!%[mj5jeDcKh1,Bip9bwoNqKvd%EM%GmudGe ?|2i{ ,&)$ g%qTrM');
define('NONCE_KEY',        '/#;lGSg#O_{cRByGC%h@lmQiH{7<u3wCey#jcvYl$uf5aS9`(i90V0IuP4((J1UP');
define('AUTH_SALT',        'M:c4a0q[=px N;OTfLNb2n~.NB=h`3itJj9+s2ok484J;+fH-:|Z7Wn]3.8MMtuD');
define('SECURE_AUTH_SALT', '5OpPO][Do<QOJ^Dt|JP?6R0zi)taj|4#;3_#M&;Or4h!=*s[k^SaZbfP 97j)B9~');
define('LOGGED_IN_SALT',   'P%r]1p|@Ws.,%F/AZ@50S_MvT[.:QtZad&U1iaU@eKLO--unLM~luFTY_SJJ+[ll');
define('NONCE_SALT',       'Q:+z_kDdvI_}]WYB]*qMH5m G%8f@ |io$PUV:|r[zCN]wKE5={u!k6Z?(paMJ^k');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
