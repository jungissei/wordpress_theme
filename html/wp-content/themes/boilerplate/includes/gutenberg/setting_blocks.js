wp.domReady(function() {
  // restrict_gutenberg_blocks();
});

/**
 * Gutenberg使用可能ブロックリスト制限
 * @see https://www.nxworld.net/wp-gutenberg-remove-default-block-ver-5-8.html
 */
function restrict_gutenberg_blocks(){
  const registerBlocks = [
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/list-item',
    'core/columns',
    'core/column',
    'core/table',
    'core/image',
    'core/spacer',
    'core/embed'
  ];
  wp.blocks.getBlockTypes().forEach( block => {
    if ( ! registerBlocks.includes( block.name ) ) {
      wp.blocks.unregisterBlockType( block.name );
    }
  } );

  const registerEmbedBlocks = [
    'twitter',
    'youtube',
    'wordpress'
  ];
  wp.blocks.getBlockVariations( 'core/embed' ).forEach( block => {
    if ( ! registerEmbedBlocks.includes( block.name ) ) {
      wp.blocks.unregisterBlockVariation( 'core/embed', block.name );
    }
  } );
}
