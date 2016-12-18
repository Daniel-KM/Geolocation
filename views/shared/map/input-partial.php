<div class="geolocation-list seven columns alpha omega">
    <h3><?php echo $allowMultipleLocations ?  __('List of locations') : __('Current location'); ?></h3>
    <table id="geolocation-locations-<?php echo $item ? $item->id : '0'; ?>" class="geolocation-locations">
        <colgroup><col /></colgroup>
        <thead>
            <tr>
                <th>
                    <?php if ($allowMultipleLocations): ?>
                    <button type="button" class="geolocation-locations-display button small green" name="geolocation_locations_display" id="geolocation_locations_display-<?php echo $item ? $item->id : '0'; ?>">
                        <?php echo __('All'); ?>
                    </button>
                    <?php endif; ?>
                </th>
                <th><?php echo __('Latitude'); ?></th>
                <th><?php echo __('Longitude'); ?></th>
                <th><?php echo __('Zoom Level'); ?></th>
                <th><?php echo __('Map Type'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($locations)):
                $key = 0;?>
                <tr id="geolocation-empty" class="geolocation-location location-empty">
                    <td colspan="5"><?php echo __('No location defined.'); ?></td>
                </tr>
            <?php else:
                foreach ($locations as $key => $location):
                    echo $this->partial('map/input-partial-row.php', array(
                        'location' => $location,
                        'key' => $key,
                        'allowMultipleLocations' => $allowMultipleLocations,
                    ));
                endforeach;
            endif;
            /*
            // New element.
            echo $this->partial('map/input-partial-row.php', array(
                'key' => $key + 1,
            ));
             */
          ?>
        </tbody>
    </table>
</div>
<div class="geolocation-add-form seven columns alpha omega">
    <h3><?php echo $allowMultipleLocations ? __('Add a new location') : __('Set the location'); ?></h3>
    <div class="field">
        <div id="location_form" class="two columns alpha">
            <label><?php echo __('Find by address or point to a location'); ?></label>
        </div>
        <div class="inputs five columns omega">
            <input type="text" name="current-geolocation[address]" id="geolocation_address" value="" placeholder="<?php echo __('Address to find'); ?>" class="textinput" />
            <button type="button" name="geolocation_location_find" id="geolocation_location_find" class="button small green">
                <?php echo __('Find'); ?>
            </button>
            <?php if ($allowMultipleLocations): ?>
            <button type="button" name="geolocation_location_add" id="geolocation_location_add" class="button small blue">
                <?php echo __('Add'); ?>
            </button>
            <?php else: ?>
            <button type="button" name="geolocation_location_set" id="geolocation_location_set" class="button small blue">
                <?php echo __('Set'); ?>
            </button>
            <?php endif; ?>
        </div>
    </div>
    <div id="omeka-map-form" class="seven columns alpha omega"></div>
</div>
